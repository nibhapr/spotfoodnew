<?php
    namespace Modules\PrintNode\Http\Controllers;

    //require __DIR__.'/../../vendor/autoload.php';

    use Mike42\Escpos\PrintConnectors\DummyPrintConnector;

    use Mike42\Escpos\Printer;



    use App\Order;

    class App
    {
        private $order;
        private $printer;
        private $connector;

        public function init($order){
            $this->order=Order::findOrFail($order->id);

            $this->connector = new DummyPrintConnector();
            $this->printer = new Printer($this->connector);
        }

        public function printKOT(){
            $this->printer->initialize();
            $this->printHeder();
            $this->printClient();
            $this->printTable();
            $this->printItemsForKOT();
            $this->printTotals();
            $this->printQR();
            $this->printer->cut();
            $code=$this->connector->getData();
            $this->printer -> close();

            return base64_encode($code);
        }

        public function printReceipt(){

            $this->printer->initialize();
            $this->printHeder();
            $this->printClient();
            $this->printTable();
            $this->printPaymentStatus();
            $this->printDeliveryOrDine();
            $this->printItems();
            $this->printTotals();
            $this->printQR();
            $this->printer->cut();
            $code=$this->connector->getData();
            $this->printer -> close();

            return base64_encode($code);

        }

        public function sendToPrintNode($cmd,$file,$id,$token){
            $curl = curl_init();
            $postData="";
            if(strlen($cmd)>5){
                $postData='printerId='.$id.'&contentType=raw_base64&content='.$cmd;
            }else {
                $postData='printerId='.$id.'&contentType=pdf_uri&content='.$file;
            }

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.printnode.com/printjobs',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            curl_setopt($curl, CURLOPT_USERPWD, $token . ":");

            $response = curl_exec($curl);

            curl_close($curl);
            return true;
        }


        
        private function printHeder(){
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->feed();
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $this->printer->text(config('app.name')." #".$this->order->id);
            $this->printer->selectPrintMode();
            $this->printer->feed();
            $this->printer->setEmphasis(true);
            $this->printer->text($this->order->restorant->name);
            $this->printer->feed();
            $this->printer->text($this->order->created_at->format(config('settings.datetime_display_format')));
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            $this->printLine();
        }

        

        private function printClient(){
            if($this->order->client){
                $this->printer->setEmphasis(true);
                $this->printer->feed();
                $this->printer->text(__("Customer").":");
                $this->printer->feed();
                $this->printer->text($this->order->client->name);
                $this->printer->feed();
                $this->printer->text($this->order->client->phone);
                $this->printer->feed();
                $this->printer->setEmphasis(false);
                $this->printer->feed();
            }
            
        }

        private function printTable(){
            if($this->order->table){
                $this->printer->setEmphasis(true);
                $this->printer->feed();
                $this->printer->text(__("Area").": ".$this->order->table->restoarea->name);
                $this->printer->feed();
                $this->printer->text(__("Table").": ".$this->order->table->name);
                $this->printer->feed();
                $this->printer->setEmphasis(false);
                $this->printer->feed();
            }
            
        }

        private function printPaymentStatus(){
            $this->printer->text(__("Payment method").": ".__(strtoupper($this->order->payment_method)));
            $this->printer->feed();
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $this->printer->text(__(ucfirst($this->order->payment_status)));
            $this->printer->feed();
            $this->printer->selectPrintMode();
        }

        private function printDeliveryOrDine(){
            $this->printer->feed();
            $this->printer->text(__("Delivery method").": ".$this->order->getExpeditionType());
            $this->printer->feed(2);
            if(strlen($this->order->time_formated)>2){
                $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
                $this->printer->text(__("Time slot"));
                $this->printer->feed();
                $this->printer->selectPrintMode();
                $this->printer->text($this->order->time_formated);
                $this->printer->feed();
            }
        }

    
        private function printItemsForKOT(){
            $this->printer->feed();
            $this->printLine();
            $this->printer->feed();
            $this->printer->setPrintLeftMargin(0);
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->selectPrintMode();
            $this->printer->setEmphasis(true);
            $this->printer->text(rtrim($this->columnify("    ".__('QTY'),__('Item'),60,40,32)));
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            foreach ($this->order->items as $key => $item) {
                $this->printer->text(rtrim($this->columnify($item->pivot->qty, $item->name,76,24,32))."\n");

                if(strlen($item->pivot->variant_name)>3){
                    $this->printer->text(rtrim($this->columnify(__('Variant:'),$item->pivot->variant_name,"",30,80,10))."\n");
                }
            
                if(strlen($item->pivot->extras)>3){
                    foreach (json_decode($item->pivot->extras) as $key => $extra) {
                        $this->printer->text(rtrim($this->columnify("",$extra,"",5,90,5))."\n");
                    }
                }
            }
            $this->printer->feed();
            $this->printer->feed();
        }

        private function printItems(){
            $this->printer->feed();
            $this->printLine();
            $this->printer->feed();
            $this->printer->setPrintLeftMargin(0);
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->selectPrintMode();
            $this->printer->setEmphasis(true);
            $this->printer->text(rtrim($this->columnify("    ".__('Item'),__('Price')." (".config('settings.cashier_currency').")",60,40,32)));
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            foreach ($this->order->items as $key => $item) {
                $theItemPrice= ($item->pivot->variant_price?$item->pivot->variant_price:$item->price);
                $this->printer->text(rtrim($this->columnify($item->pivot->qty." X ".$item->name,$item->pivot->qty*$theItemPrice,76,24,32))."\n");

                if(strlen($item->pivot->variant_name)>3){
                    $this->printer->text(rtrim($this->columnify(__('Variant:'),$item->pivot->variant_name,30,70,32))."\n");
                }
            
                if(strlen($item->pivot->extras)>3){
                    foreach (json_decode($item->pivot->extras) as $key => $extra) {
                        $this->printer->text(rtrim($this->columnify("",$extra,5,96,32))."\n");
                    }
                }
            
            }
            $this->printer->feed();
            $this->printer->feed();
        }


        private function printTotals(){
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->selectPrintMode();
            $this->printer->setEmphasis(true);
            $this->printer->text(rtrim($this->columnify(__('Subtotal'),config('settings.cashier_currency')." ".$this->order->order_price,60,40,32)));
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            $this->printer->setEmphasis(true);
            $this->printer->feed();
            $this->printer->text(rtrim($this->columnify(__('Total'),config('settings.cashier_currency')." ". ($this->order->delivery_price+$this->order->order_price),60,40,32)));
            $this->printer->setEmphasis(false);
            $this->printer->feed();
        }

        private function printQR(){
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->qrCode($this->order->id);
            $this->printer->feed();
        }
        
        public function columnify($leftCol, $rightCol, $leftWidthPercent, $rightWidthPercent, $char_per_line=32,$space = 2)
        {
        
            $leftWidth = $char_per_line * $leftWidthPercent / 100;
            $rightWidth = $char_per_line * $rightWidthPercent / 100;

            $leftWrapped = wordwrap($leftCol, $leftWidth, "\n", true);
            $rightWrapped = wordwrap($rightCol, $rightWidth, "\n", true);

            $leftLines = explode("\n", $leftWrapped);
            $rightLines = explode("\n", $rightWrapped);
            $allLines = array();
            for ($i = 0; $i < max(count($leftLines), count($rightLines)); $i++) {
                $leftPart = str_pad(isset($leftLines[$i]) ? $leftLines[$i] : '', $leftWidth, ' ');
                $rightPart = str_pad(isset($rightLines[$i]) ? $rightLines[$i] : '', $rightWidth, ' ');
                $allLines[] = $leftPart . str_repeat(' ', $space) . $rightPart;
            }
            

            if (!defined('PHP_VERSION_ID')) {
                $version = explode('.', PHP_VERSION);
            
                define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
            }

        if(PHP_VERSION_ID<80001){
            return implode($allLines, "\n") . "\n";
        }else{ 
            return implode("\n",$allLines) . "\n";
        }
            
        }

        

        private function printLine(){
            $this->printer->text("___________________________");
            $this->printer->feed();
        }
    }

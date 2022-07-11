<!DOCTYPE html>
<html>
 @include('restorants.templates.head')
<body>
    <?php
        function clean($string) {
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
            return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        }
    ?>
    @include('restorants.templates.mobile-menu')
    <div id='wrapper'>
         @include('restorants.templates.logo_and_menu')
         @include('restorants.partials.modals')
         @include('restorants.templates.call_waiter')
         @include('restorants.templates.place-header')
         @include('restorants.templates.place-content')
         @if (isset($doWeHaveImpressumApp)&&$doWeHaveImpressumApp&&strlen($restorant->getConfig('impressum_value',''))>5)
         @include('restorants.templates.impressum')
        @endif
         
    </div>
@include('restorants.templates.scripts')
    
    
</body>

</html>
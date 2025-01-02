import './bootstrap';
import Alpine from 'alpinejs';
import $ from 'jquery';

// alpine
if(!window.Alpine){
    window.Alpine = Alpine
    Alpine.start()
}
// jquery
if(!window.jQuery){
    window.jQuery = window.$ = $
}
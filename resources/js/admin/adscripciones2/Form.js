import AppForm from '../app-components/Form/AppForm';

Vue.component('adscripciones2-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                Nombre:  '' ,
                
            }
        }
    }

});
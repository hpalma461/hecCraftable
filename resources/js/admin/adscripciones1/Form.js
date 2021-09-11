import AppForm from '../app-components/Form/AppForm';

Vue.component('adscripciones1-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                Nombre:  '' ,
                
            }
        }
    }

});
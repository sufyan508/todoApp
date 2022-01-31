import AppForm from '../app-components/Form/AppForm';

Vue.component('task-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                label:  '' ,
                color:  '' ,
                icon:  '' ,
                due_date:  '' ,
                description:  '' ,
                re_order:  '' ,
                
            }
        }
    }

});
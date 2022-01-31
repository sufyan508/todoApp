import AppForm from "../app-components/Form/AppForm";
import VueIconPicker from "vue-icon-picker";
import { ColorPicker, ColorPanel } from "one-colorpicker";

Vue.use(ColorPanel);
Vue.use(ColorPicker);

Vue.component("task-form", {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                label: "",
                color: "",
                icon: "",
                due_date: "",
                description: "",
                re_order: "",
            },
        };
    },
});

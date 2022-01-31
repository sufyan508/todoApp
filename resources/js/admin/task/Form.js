import AppForm from "../app-components/Form/AppForm";
import { ColorPicker, ColorPanel } from "one-colorpicker";
import { fontAwesomePicker } from "font-awesome-picker";

Vue.use(ColorPanel);
Vue.use(ColorPicker);

Vue.component("task-form", {
    methods: {
        yourFunction(selectedIcon) {
            console.log('selected', selectedIcon)
        },
    },
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
    "font-awesome-picker": fontAwesomePicker,
});

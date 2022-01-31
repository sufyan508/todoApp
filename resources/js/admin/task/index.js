import "./Listing";
import "./Form";
import draggable from "vuedraggable";
let id = 1;
export default {
    created() {
        alert();
    },
    name: "simple",
    display: "Simple",
    order: 0,
    components: {
        draggable,
    },
    data() {
        return {
            enabled: true,
            list: [
                { name: "John", id: 0 },
                { name: "Joao", id: 1 },
                { name: "Jean", id: 2 },
            ],
            dragging: false,
        };
    },
    computed: {
        draggingInfo() {
            return this.dragging ? "under drag" : "";
        },
    },
    methods: {
        add: function () {
            this.list.push({ name: "Juan " + id, id: id++ });
        },
        replace: function () {
            this.list = [{ name: "Edgard", id: id++ }];
        },
        checkMove: function (e) {
            window.console.log("Future index: " + e.draggedContext.futureIndex);
        },
    },
};

<template>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Action</th>
            <th>ID</th>
            <th>Label</th>
            <th>Color</th>
            <th>Icon</th>
            <th>Description</th>

        </tr>
        </thead>

        <draggable :list="tasksNew" :options="{animation:200, handle:'.my-handle'}" :element="'tbody'" @change="update">

            <tr v-for="(task, index) in tasksNew">

                <td>
                 <a :href="'tasks/delete/'+task.id" type="submit" class="btn btn-danger btn-xs">Delete</a>

                </td>
                <td>{{ task.id }}</td>
                <td>{{ task.label }}</td>
                <td>{{ task.color }}</td>
                <td>{{ task.icon }}</td>
                <td>{{ task.description }}</td>
                <td><i class="fa fa-arrows my-handle"></i></td>
            </tr>

        </draggable>

    </table>
</template>

<script>
import draggable from 'vuedraggable'

export default {
    components: {
        draggable
    },

    props: ['tasks'],

    data() {
        return {
            tasksNew: [],

            csrf: document.head.querySelector('meta[name="csrf-token"]').content
        }
    },

    methods: {
        update() {
            this.tasksNew.map((testimonial, index) => {
                testimonial.order = index + 1;
            })

            axios.put('/api/user/tasks/task-sortable', {
                testimonials: this.tasksNew
            }).then((response) => {
                // success message
            })
        }
    },

    mounted() {

        this.tasksNew =  this.tasks;
        console.log('Component mounted.')
    }
}
</script>

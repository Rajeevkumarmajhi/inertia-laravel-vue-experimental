<script setup>
import { router } from '@inertiajs/vue3';

defineProps({
    customers: Object
});

function edit(id){
    router.get('customer/'+id+'/edit');
}

function destroy(id){
    router.delete('/customer/'+id);
}

function create(){
    router.get('/customer/create');
}

</script>

<template>
    <div class="card col-6 offset-3 mt-5">
        <div class="card-header">
            Customers <button @click="create" class="btn btn-primary float-right">Add</button>
        </div>
        <div class="card-body">
            <div v-if="$page.props.flash.message" class="alert alert-success">{{$page.props.flash.message}}</div>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr >
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers">
                        <td>{{ customer.name }}</td>
                        <td>
                            <button class="btn btn-sm btn-info">View</button>
                            <button @click.prevent="edit(customer.id)" class="btn btn-sm btn-primary">Edit</button>
                            <button @click.prevent="destroy(customer.id)" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
    errors: Object
});


const form = useForm({
    name:null,
    email:null,
    phone:null,
});

function submit(){
    router.post('/customer',form);
}

function customerList(){
    router.get('/customer');
}

</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Create Customer <button @click="customerList" class="btn btn-primary">Customer List</button>
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Name">
                    <div class="text-danger text-xs" v-if="errors.name" >{{ errors.name }}</div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" v-model="form.email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    <div class="text-danger text-xs" v-if="errors.email" >{{ errors.email }}</div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" id="phone" v-model="form.phone" placeholder="Phone">
                    <div class="text-danger text-xs" v-if="errors.phone" >{{ errors.phone }}</div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</template>
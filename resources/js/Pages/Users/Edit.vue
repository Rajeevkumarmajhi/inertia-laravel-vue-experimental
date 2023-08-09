<template>
    <Layout>

        <Head>
            <title>Users</title>
            <meta type="description" content="User Page" head-key="description" />
        </Head>

        <div class="flex justify-between mb-6">
            <h1 class="text-3xl">Users</h1>

            <input v-model="search" type="text" placeholder="Search...." class="border px-2 rounded-lg" />
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id"
                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.name }}
                        </th>
                        <td class="px-6 py-4">
                            <Link :href="`/users/${user.id}/edit`"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <Pagination :links="users.links" />

        </div>
    </Layout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '../../Shared/Pagination.vue';
import { ref, watch } from 'vue';
// import { Inertia } from '@inertiajs/inertia';
import { router } from '@inertiajs/vue3';

defineProps({ users: Object });

let search = ref('');

watch(search,value => {
    router.get('/users', { search: value },{ preserveState : true, replace: true });
});
</script>
<template>
    <nav>
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>                
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">Users</NavLink>                
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>                
            </li>
            <li><Link class="text-blue-500 hover:underline" :class="{'font-bold underline': $page.url === '/logout' }" method="post" as="button" href="/logout">Logout</Link></li>
        </ul>
    </nav>

</template>

<script>
import { Link } from '@inertiajs/vue3';
import NavLink from '../Shared/NavLink.vue';

export default{
    components: { Link, NavLink },
}
</script>
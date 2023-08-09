<template>
    <Link class="text-black hover:underline" :class="{'font-bold underline': active }" >
        <slot />
    </Link>
</template>

<script>

import { Link } from '@inertiajs/vue3';

export default {
    components:{ Link },
    props:{
        active: Boolean,
    }
}

</script>
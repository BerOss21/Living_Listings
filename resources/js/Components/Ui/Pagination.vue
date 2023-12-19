<template>
    <div class="flex items-center justify-center">
        <Link v-for="(link,index) in links" :href="link.url" :key="index" v-html="link.label" 
        class="py-2 px-4 border border-slate-300 rounded"
        :class="{'bg-indigo-700 text-white shadow-sm':link.active}"
        ></Link>
    </div>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3";

    defineProps({
        links:Array
    })

</script>

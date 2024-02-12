<template>
     <div class="bg-orange-300 mx-auto bg-opacity-70 rounded-lg p-3 font-semibold">
        {{ message }}
    </div>
</template>

<script setup>
    defineProps(['message'])
</script>

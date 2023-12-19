<template>
    <div class="font-bold">
        {{ formatedPrice }}
    </div>
</template>

<script setup>
    import { computed } from "vue"

    const props=defineProps({
        price:[Number,String]
    })

    const formatedPrice=computed(()=>{
        return Number(props.price).toLocaleString('en-EN',{
            style: 'currency', 
            currency: 'USD' 
        })
    })

</script>


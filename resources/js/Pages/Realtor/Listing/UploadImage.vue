<template>
    <div class="flex flex-col gap-2">
        <box>
            <template #title>Upload images</template>
            <div class="mt-3">
                <form @submit.prevent='uplaodFiles'>
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div>
                            <input type="file" @input="handleFiles" multiple class="form-input rounded w-full">
                        </div>
                        <div class="flex flex-nowrap gap-2">
                            <button type="submit" class="btn-transparent bg-slate-300">Upload</button>
                            <button @click.prevent="resetForm" class="btn-transparent bg-blue-400">Reset</button>
                        </div>
                    </div>
                    <div class="mt-1">
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    </div>
                    <div v-if="form.errors.images" class="validation-error mt-1">{{ form.errors.images }}</div>
                </form>
            </div>
        </box>
        <box>
            <template #title>
                Listing images
            </template>
            <div class="w-full mx-auto grid grid-cols-1 md:grid-cols-3 gap-3 mt-4">
                <div v-for="(image,index) in listing.media" :key="index" class="col-span-1 flex flex-col gap-1">
                    <img :src="image.original_url" :alt="index" class="h-full w-full border border-slate-400 rounded block">
                    <Link :href="route('realtor.listings.images.destroy',image.id)" method="delete" as="button" class="p-1 rounded bg-slate-300 ">Delete</Link>
                </div>              
            </div>
        </box>
    </div>
</template>

<script setup>
    import Box from "@/Components/Ui/Box.vue";
    import { Link, useForm } from "@inertiajs/vue3";

    const props=defineProps({
        listing:Object
    })

    const form=useForm({
        images:[]
    })

    const handleFiles=(e)=>{
        form.images=e.target.files
    }

    const uplaodFiles=()=>{
        form.post(route('realtor.listings.images.upload',props.listing.id),{
            preserveScroll: true,
            onSuccess: () => resetForm()
        })
    }

    const resetForm=()=>{
        form.reset('images')
    }

</script>


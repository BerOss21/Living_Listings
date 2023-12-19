<template>
    <div class="container">
        <form @submit.prevent="submitForm">
            <div class="flex-col md:grid md:grid-cols-12 gap-3">
                <div class="md:col-span-4">
                    <label for="beds" class="label">Beds</label>
                    <input type="number" id="beds" v-model="form.beds" class="input">
                    <div v-if="form.errors.beds" class="validation-error">{{ form.errors.beds }}</div>
                </div>
                <div class="md:col-span-4">
                    <label for="baths" class="label">Baths</label>
                    <input type="number" id="baths" v-model="form.baths" class="input">
                    <div v-if="form.errors.baths" class="validation-error">{{ form.errors.baths }}</div>
                </div>
                <div class="md:col-span-4">
                    <label for="area" class="label">Area</label>
                    <input type="number" id="area" v-model="form.area" class="input">
                    <div v-if="form.errors.area" class="validation-error">{{ form.errors.area }}</div>
                </div>
                <div class="col-span-8">
                    <label for="city" class="label">City</label>
                    <input type="text" id="city" v-model="form.city" class="input">
                    <div v-if="form.errors.city" class="validation-error">{{ form.errors.city }}</div>
                </div>
                <div class="md:col-span-4">
                    <label for="code" class="label">Code</label>
                    <input type="text"  class="input" id="code" v-model="form.code">
                    <div v-if="form.errors.code" class="validation-error">{{ form.errors.code }}</div>
                </div>
                <div class="col-span-8">
                    <label for="street" class="label">Street</label>
                    <input type="text" class="input" id="street" v-model="form.street">
                    <div v-if="form.errors.street" class="validation-error">{{ form.errors.street }}</div>
                </div>
                <div class="md:col-span-4">
                    <label for="street_nr" class="label">Street number</label>
                    <input type="number" class="input" id="street_nr" v-model="form.street_nr">
                    <div v-if="form.errors.street_nr" class="validation-error">{{ form.errors.street_nr }}</div>
                </div>
                <div class="col-span-12">
                    <label for="price" class="label">Price</label>
                    <input type="number" step="0.1" class="input" id="price" v-model="form.price">
                    <div v-if="form.errors.price" class="validation-error">{{ form.errors.price }}</div>
                </div>
                <div class="md:col-span-3 md:col-start-10 mt-4">
                    <button type="submit"  class="btn-primary w-full">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { useForm } from "@inertiajs/vue3";

    const props=defineProps({
        listing:{
            type:Object
        }
    })

    const form=useForm({
        beds:props.listing.beds,
        baths:props.listing.baths,
        area:props.listing.area,
        city:props.listing.city,
        code:props.listing.code,
        street:props.listing.street,
        street_nr:props.listing.street_nr,
        price:props.listing.price
    })

    const submitForm=()=>{
        form.submit('patch',route('realtor.listings.update',props.listing.id));
    }
</script>


<template>
    <div>
        <input v-if="props.readonly === 'true'" :id="inputID" :type="type" :value="modelValue" :placeholder="placeholder"
               class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'" readonly/>

        <input v-else :id="inputID" :type="type" :value="modelValue" :placeholder="placeholder"
               class="block max-w-full w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" :class="error ? 'border-red-300' : 'border-gray-300'"
               @input="emits('update:modelValue', $event.target.value)"/>
    </div>
</template>

<script setup>
import {computed, isReadonly} from 'vue';

    const emits = defineEmits([
        'update:modelValue',
    ]);

    const props = defineProps({
        modelValue: {
            type: String,
            default: ""
        },
        placeholder: {
            type: String,
            default: ""
        },
        type: {
            type: String,
            default: "text"
        },
        error: {
            type: String,
            default: ""
        },
        inputID: {
            type: String,
            default: ""
        },
        readonly: {
            type: String,
            default: ""
        }
    });

</script>

<template>
    <DefaultPanel title="Grupos">
        <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Criar Grupo</h3>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <DivInput id="name" text="Nome" col="2" class="mt-2">
                        <InputDefault inputID="name" v-model="form.name" :error="$page.props.errors.name" />
                        <InputAlertError :error="$page.props.errors.name"/>
                    </DivInput>

                    <DivInput id="observation" text="Observação" col="2" class="mt-2">
                        <TextareaDefault inputID="observation" v-model="form.observation" rows="6" :error="$page.props.errors.observation" />
                        <InputAlertError :error="$page.props.errors.observation"/>
                    </DivInput>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <CancelButton :link="route(`groups.index`)" />
                    <CreateButton @click="submit"/>
                </div>
            </div>
        </div>
    </DefaultPanel>
</template>

<script setup>
    import DefaultPanel from "@/Customs/Panels/DefaultPanel.vue";
    import CreateButton from "@/Customs/Buttons/CreateButton.vue";
    import CancelButton from "@/Customs/Buttons/CancelButton.vue";
    import DivInput from "@/Customs/Inputs/DivInput.vue";

    import { router } from '@inertiajs/vue3';
    import {reactive} from "vue";
    import InputAlertError from "@/Customs/Inputs/InputAlertError.vue";
    import InputDefault from "@/Customs/Inputs/InputDefault.vue";
    import TextareaDefault from "@/Customs/Inputs/TextareaDefault.vue";

    let form = reactive({
        name: '',
        observation: '',
    });

    let submit = () => {
        router.post(route(`groups.store`), form, { preserveScroll: true });
    }

</script>

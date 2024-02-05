<template>
    <DefaultPanel title="Nodes">
        <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Ver Node</h3>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <DivInput id="id" text="ID" col="2" class="mt-2">
                        <InputDefault inputID="id" v-model="props.node.id" :error="$page.props.errors.id" readonly="true"/>
                    </DivInput>

                    <DivInput id="name" text="Nome" col="2" class="mt-2">
                        <InputDefault inputID="name" v-model="form.name" :error="$page.props.errors.name" readonly="true"/>
                        <InputAlertError :error="$page.props.errors.name"/>
                    </DivInput>

                    <DivInput id="observation" text="Observação" col="2" class="mt-2">
                        <TextareaDefault inputID="observation" v-model="form.observation" rows="6" :error="$page.props.errors.observation" readonly="true"/>
                        <InputAlertError :error="$page.props.errors.observation"/>
                    </DivInput>

                    <DivInput id="group_id" text="Grupo" col="2" class="mt-2">
                        <InputSelect inputID="group_id" v-model="form.group_id" :error="$page.props.errors.group_id" disabled="disabled">
                            <option v-for="(item, itemIndex) in props.groups" :key="itemIndex" :value="item.id" >{{ item.name }}</option>
                        </InputSelect>
                        <InputAlertError :error="$page.props.errors.group_id"/>
                    </DivInput>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <CancelButton :link="route(`nodes.index`)" />
                </div>
            </div>
        </div>
    </DefaultPanel>
</template>

<script setup>
    import DefaultPanel from "@/Customs/Panels/DefaultPanel.vue";
    import DivInput from "@/Customs/Inputs/DivInput.vue";
    import CancelButton from "@/Customs/Buttons/CancelButton.vue";
    import {reactive} from "vue";
    import InputAlertError from "@/Customs/Inputs/InputAlertError.vue";
    import InputDefault from "@/Customs/Inputs/InputDefault.vue";
    import TextareaDefault from "@/Customs/Inputs/TextareaDefault.vue";
    import InputSelect from "@/Customs/Inputs/InputSelect.vue";

    const props = defineProps({
        node: Object,
        groups: Object
    });

    let form = reactive({
        name: props.node.name,
        observation: props.node.observation,
        group_id: props.node.group_id,
    });
</script>

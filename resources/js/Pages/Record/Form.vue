<script setup lang="ts">
import { ref } from 'vue';

type InputGroup = {
    key: string;
    value: string;
};

export type FormData = InputGroup[];

interface Props {
    onSubmit: (data: FormData) => Promise<void>;
    active: boolean;
}

const props = defineProps<Props>();

const createInputGroup = (): InputGroup => ({ key: '', value: '' });
const inputGroups = ref<FormData>([createInputGroup()]);

const addInputGroup = () => {
    inputGroups.value.push(
        createInputGroup()
    );
}

const removeInputGroup = (index: number) => {
    inputGroups.value.splice(index, 1);
}

const handleSubmit = () => {
    const data = filter(inputGroups.value);
    if (data.length) {
        props.onSubmit(data);
    }
};

const filter = (data: FormData): FormData => {
    return data.filter(block => block.key && block.value);
}
</script>

<template>
    <form
        @submit.prevent="handleSubmit"
        class="record-form"
        :inert="!props.active"
    >
        <div
            v-for="(input, index) in inputGroups"
            :key="index"
            class="input-group"
        >
            <label>
                <span>key</span>
                <input v-model="input.key" />
            </label>
            <label>
                <span>value</span>
                <input v-model="input.value" />
            </label>

            <button
                type="button"
                @click.prevent="() => removeInputGroup(index)"
                :disabled="inputGroups.length === 1"
            >
                x
            </button>
        </div>

        <div class="input-group">
            <button
                type="button"
                @click.prevent="addInputGroup"
            >
                +
            </button>
            <button
                type="submit"
            >
                Получить
            </button>
        </div>
    </form>
</template>

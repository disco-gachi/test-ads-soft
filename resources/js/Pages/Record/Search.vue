<script setup lang="ts">
import axios, { type AxiosResponse } from 'axios';
import { reactive, ref } from 'vue';
import Form, { type FormData } from './Form.vue';
import RecordList from './RecordList.vue';
import Spinner from '../../Shared/Spinner.vue';
import { type RecordType } from './types';


const messageList = {
    recordsNotFound: 'Записи отсутствуют',
} as const;

const isLoading = ref(false);
const message = ref('');
const state = reactive<{ recordList: RecordType[] }>({
    recordList: [],
});

const onSubmit = async (data: FormData) => {
    isLoading.value = true;
    message.value = '';

    try {
        const response = await axios.post<RecordType[]>('/api/records', {
            data: prepareData(data),
        });

        handleResponse(response);
    } catch (e) {
        // 
    }

    isLoading.value = false;
};

const prepareData = (data: FormData): string[][] =>
    data.map(pair => Object.values(pair));

const handleResponse = (response: AxiosResponse<RecordType[]>) => {
    const { data } = response;

    state.recordList = Array.isArray(data) ? filter(data) : [];

    if (!state.recordList.length) {
        message.value = messageList.recordsNotFound;
    }
}

const filter = (data: RecordType[]): RecordType[] =>
    data.filter(record => Number(record.access)); // "В случае существования записи и наличии доступа"
</script>

<template>
    <div class="record-search-wrapper">
        <Form :onSubmit="onSubmit" :active="!isLoading" />

        <div v-if="message" class="message">{{ message }}</div>

        <RecordList
            v-if="state.recordList.length"
            :data="state.recordList"
        />
    </div>

    <Spinner v-if="isLoading" />
</template>
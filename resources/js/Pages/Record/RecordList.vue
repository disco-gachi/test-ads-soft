<script setup lang="ts">
import { type RecordType } from './types';

interface Props {
    data: RecordType[];
}

const props = defineProps<Props>();

const formatData = (data: RecordType['data']): string => {
    return JSON.stringify(data);
}
</script>

<template>
    <div class="records">
        <div class="record-item header">
            <div>id</div>
            <div>data</div>
            <div>access</div>
        </div>
        <div
            v-for="(record, index) in props.data"
            :key="index"
            class="record-item"
        >
            <div>{{ record.id }}</div>
            <div>{{ formatData(record.data) }}</div>
            <div>{{ record.access }}</div>
        </div>
    </div>
</template>

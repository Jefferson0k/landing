<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Dialog from 'primevue/dialog';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Message from 'primevue/message';

const visible = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const deleteUser = (e) => {
    e.preventDefault();

    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value?.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    visible.value = false;
    form.clearErrors();
    form.reset();
};
</script>

<template>
    <br />
    <div class="space-y-6">
        <!-- Encabezado -->
        <div class="flex items-center gap-3">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Eliminación de Cuenta</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Esta acción es permanente. Elimina tu cuenta y todos sus datos asociados.
                </p>
            </div>
        </div>

        <!-- Advertencia -->
        <Message severity="error" :closable="false" class="p-4">
            <div class="flex items-start gap-4">
                <i class="pi pi-exclamation-circle text-3xl text-red-600 mt-1"></i>
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-red-700 dark:text-red-400">Advertencia</h4>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                        Esta acción es irreversible. Todos los datos se perderán permanentemente.
                    </p>
                        <Button label="Eliminar cuenta" icon="pi pi-trash" severity="danger" @click="visible = true" />
                </div>
            </div>
        </Message>

        <!-- Diálogo de confirmación -->
        <Dialog v-model:visible="visible" modal header="¿Estás seguro?" :style="{ width: '30rem' }">
            <form @submit="deleteUser" class="flex flex-col gap-4">
                <p class="text-sm text-gray-700 dark:text-gray-300">
                    Una vez eliminada, no podrás recuperar esta cuenta. Introduce tu contraseña para confirmar.
                </p>

                <div class="flex flex-col gap-1">
                    <label for="password" class="text-sm font-medium">Contraseña</label>
                    <InputText id="password" type="password" v-model="form.password" ref="passwordInput"
                        placeholder="Introduce tu contraseña" class="w-full" />
                    <small class="text-red-500" v-if="form.errors.password">
                        {{ form.errors.password }}
                    </small>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <Button label="Cancelar" icon="pi pi-times" severity="secondary" @click="closeModal"
                        type="button" />
                    <Button label="Eliminar" icon="pi pi-trash" severity="danger" type="submit"
                        :loading="form.processing" />
                </div>
            </form>
        </Dialog>
    </div>
</template>

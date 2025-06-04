<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AppMenuItem from './AppMenuItem.vue';

const page = usePage();
const permissions = computed(() => page.props.auth.user?.permissions ?? []);
const user = computed(() => page.props.auth.user);
const hasPermission = (perm) => permissions.value.includes(perm);

// Función para obtener las iniciales del nombre del usuario
const getUserInitials = (user) => {
    if (!user?.name) return 'U';
    return user.name
        .split(' ')
        .map(word => word.charAt(0))
        .join('')
        .toUpperCase()
        .substring(0, 2);
};

const model = computed(() => [
    {
        label: 'Home',
        items: [
            { label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/dashboard' }
        ]
    },
].filter(section => section.items.length > 0));
</script>

<template>
    <div class="layout-menu-container">
        <!-- Sección del Avatar -->
        <div class="user-avatar-section">
            <div class="user-avatar">
                <!-- Si el usuario tiene foto, mostrarla, sino mostrar iniciales -->
                <img 
                    v-if="user?.avatar" 
                    :src="user.avatar" 
                    :alt="user?.name || 'Usuario'"
                    class="avatar-image"
                />
                <div v-else class="avatar-initials">
                    {{ getUserInitials(user) }}
                </div>
            </div>
            <div class="user-info">
                <p class="user-name">{{ user?.name || 'Usuario' }}</p>
                <p class="user-email">{{ user?.email || 'email@ejemplo.com' }}</p>
                <p class="user-id">ID: {{ user?.id || '---' }}</p>
            </div>
        </div>

        <!-- Menú existente -->
        <ul class="layout-menu">
            <template v-for="(item, i) in model" :key="i">
                <app-menu-item :item="item" :index="i" />
            </template>
        </ul>
    </div>
</template>

<style scoped lang="scss">
.layout-menu-container {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.user-avatar-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 2rem 1rem;
    margin-bottom: 1rem;
    
    .user-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 1rem;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-color, #3b82f6);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        
        .avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .avatar-initials {
            color: white;
            font-weight: 700;
            font-size: 1.8rem;
            text-transform: uppercase;
        }
    }
    
    .user-info {
        width: 100%;
        
        .user-name {
            margin: 0 0 0.5rem 0;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--text-color, #1f2937);
            word-wrap: break-word;
        }
        
        .user-email {
            margin: 0 0 0.5rem 0;
            font-size: 0.85rem;
            color: var(--text-color-secondary, #6b7280);
            word-wrap: break-word;
        }
        
        .user-id {
            margin: 0;
            font-size: 0.75rem;
            color: var(--text-color-secondary, #9ca3af);
            font-weight: 500;
            background: var(--surface-100, #f3f4f6);
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            display: inline-block;
        }
    }
}

.layout-menu {
    flex: 1;
    overflow-y: auto;
}

/* Hover effect para la sección del usuario */
.user-avatar-section:hover {
    cursor: pointer;
    transition: all 0.2s ease;
    
    .user-avatar {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .user-avatar-section {
        padding: 1.5rem 0.75rem;
        
        .user-avatar {
            width: 70px;
            height: 70px;
            margin-bottom: 0.75rem;
            
            .avatar-initials {
                font-size: 1.6rem;
            }
        }
        
        .user-info {
            .user-name {
                font-size: 1rem;
            }
            
            .user-email {
                font-size: 0.8rem;
            }
            
            .user-id {
                font-size: 0.7rem;
            }
        }
    }
}
</style>
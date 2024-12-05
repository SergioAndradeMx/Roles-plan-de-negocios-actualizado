<div class="bg-gray-800 shadow-sm mb-4 rounded-lg">
    <div class="p-4">
        <ul class="space-y-4">
            <!-- Primer enlace -->
            <a href="{{ route('plan_de_negocio.descripciones.index', $plan_de_negocio) }}" class="flex items-center text-white text-decoration-none hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-card-checklist mr-2 hover:text-blue-500" viewBox="0 0 16 16">
                    <path d="..."/>
                </svg>
                <span>Lista de Descripciones</span>
            </a>
            <!-- Segundo enlace -->
            <a href="{{ route('plan_de_negocio.organigramas.index', $plan_de_negocio) }}" class="flex items-center text-white text-decoration-none hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building mr-2 hover:text-blue-500" viewBox="0 0 16 16">
                    <path d="..."/>
                </svg>
                <span>Organigrama</span>
            </a>
            <!-- Tercer enlace corregido -->
            <a href="{{ route('plan_de_negocio.proyecciones.index', $plan_de_negocio) }}" class="flex items-center text-white text-decoration-none hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building mr-2 hover:text-blue-500" viewBox="0 0 16 16">
                    <path d="..."/>
                </svg>
                <span>Proyección de Sueldo</span>
            </a>
            <a href="{{ route('plan_de_negocio.proyecciones.resumen', $plan_de_negocio) }}" class="flex items-center text-white text-decoration-none hover:scale-105 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-building mr-2 hover:text-blue-500" viewBox="0 0 16 16">
                    <path d="..."/>
                </svg>
                <span>Resumen</span>
            </a>
        </ul>
    </div>
</div>

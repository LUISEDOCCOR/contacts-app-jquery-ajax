<header class="mb-10 flex items-center justify-between">
    <h1 class="text-2xl font-bold">
        <i class="fa-solid fa-address-book"></i>
        App Contactos
    </h1>
</header>
<main class="space-y-8">
    <section class="border-neutral-400 border rounded-md p-4 space-y-5" >
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Añadir Contacto</h2>
            <span class=" text-neutral-500" >Ingresa el nombre y número del nuevo contacto</span>
        </div>
        <form action="/contact/create" method="post" class="grid gap-4 grid-cols-1 xl:grid-cols-2">
            <label class="space-y-2" for="contact_name">
                <span class="font-semibold">Nombre</span>
                <input
                    type="text"
                    placeholder="Ingresa el nombre"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="contact_name"
                    id="contact_name"
                >
            </label>
            <label class="space-y-2" for="contact_number">
                <span class="font-semibold">Número</span>
                <input
                    type="tel"
                    placeholder="Ingresa el número"
                    class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                    name="contact_number"
                    id="contact_number"
                >
            </label>
            <label for="contact_notes" class="space-y-2 col-span-1 xl:col-span-2">
                <span class="font-semibold">Notas</span>
                <textarea
                    name="contact_notes"
                    id="contact_notes"
                    class="px-4 w-full py-2 border border-neutral-400
                    rounded-md"
                    placeholder="Notas:"
                ></textarea>
            </label>
            <button
                class="bg-black rounded-md text-white
                px-4 py-2 font-bold hover:opacity-75 transition-opacity
                col-span-1 xl:col-span-2"
                type="submit"
            >
                Agregar
            </button>
        </form>
    </section>
    <section class="border-neutral-400 border rounded-md p-4 space-y-5">
        <div class="space-y-2">
            <h2 class="text-2xl font-bold">Lista de Contactos</h2>
            <span class=" text-neutral-500" >Estos son todos tus contactos</span>
        </div>
        <div class="flex flex-col gap-4 max-h-[30vh] overflow-hidden overflow-y-auto">
        <?php foreach ($contacts as $contact): ?>
            <div
                class="border-neutral-400 border rounded-md p-3
                flex flex-col items-start gap-4 xl:items-center xl:flex-row
                xl:justify-between"
            >
                <div>
                    <span class="text-lg font-semibold block">
                        <?= $contact["name"] ?>
                    </span>
                    <span class="text-neutral-700" >
                        <?= $contact["number"] ?>
                    </span>
                </div>
                <div class="flex gap-2 w-full justify-end xl:justify-center xl:w-auto">
                    <a
                        href="/contact/delete?id=<?= $contact["id"] ?>"
                        class="cursor-pointer bg-red-400 aspect-square flex justify-center
                        items-center rounded-md hover:opacity-75 transition-opacity w-9
                        text-lg xl:text-xl xl:w-12"
                        aria-label="delete contact"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <button
                        class="btnModalContactInfo cursor-pointer bg-blue-400 aspect-square flex justify-center
                        items-center rounded-md hover:opacity-75 transition-opacity w-9
                        text-lg xl:text-xl xl:w-12"
                        data-id="<?= $contact["id"] ?>"
                        aria-label="show more info"
                    >
                        <i class="fa-solid fa-folder-open"></i>
                    </button>
                    <button
                        class="btnModalContactEdit cursor-pointer bg-yellow-400 aspect-square flex justify-center
                        items-center rounded-md hover:opacity-75 transition-opacity w-9
                        text-lg xl:text-xl xl:w-12"
                        data-id="<?= $contact["id"] ?>"
                        aria-label="edit contact"

                    >
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section>
        <dialog id="modalContactInfo" class="modal">
          <div class="modal-box">
            <h3 class="text-lg font-bold" id="containerContactName"></h3>
            <p class="py-4 textarea-sm">Presiona la tecla ESC o haz clic en el botón de abajo para cerrar</p>
            <p id="containerContactInfo"></p>
            <div class="modal-action">
              <form method="dialog">
                <button class="btn">Cerrar</button>
              </form>
            </div>
          </div>
        </dialog>
        <dialog id="modalContactEdit" class="modal">
          <div class="modal-box">
            <h3 class="text-lg font-bold" id="containerContactName">Editar contacto</h3>
            <p class="py-4 textarea-sm">Presiona la tecla ESC o haz clic en el botón de abajo para cerrar</p>
            <form action="/contact/edit" method="post" class="grid gap-4 grid-cols-1 xl:grid-cols-2">
                <label class="space-y-2" for="edit_contact_name">
                    <span class="font-semibold">Nombre</span>
                    <input
                        type="text"
                        placeholder="Ingresa el nombre"
                        class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                        name="edit_contact_name"
                        id="edit_contact_name"
                    >
                </label>
                <label class="space-y-2" for="edit_contact_number">
                    <span class="font-semibold">Número</span>
                    <input
                        type="tel"
                        placeholder="Ingresa el número"
                        class="px-4 w-full py-2 border border-neutral-400 rounded-md"
                        name="edit_contact_number"
                        id="edit_contact_number"
                    >
                </label>
                <label for="edit_contact_notes" class="space-y-2 col-span-1 xl:col-span-2">
                    <span class="font-semibold">Notas</span>
                    <textarea
                        name="edit_contact_notes"
                        id="edit_contact_notes"
                        class="px-4 w-full py-2 border border-neutral-400
                        rounded-md"
                        placeholder="Notas:"
                    ></textarea>
                </label>
                <input type="hidden" name="edit_contact_id" id="edit_contact_id">
                <button
                    class="bg-black rounded-md text-white
                    px-4 py-2 font-bold hover:opacity-75 transition-opacity
                    col-span-1 xl:col-span-2"
                    type="submit"
                >
                    Editar
                </button>
            </form>
            <div class="modal-action">
              <form method="dialog">
                <button class="btn">Cerrar</button>
              </form>
            </div>
          </div>
        </dialog>
    </section>
</main>

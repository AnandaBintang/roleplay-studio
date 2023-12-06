import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const editorElements = document.querySelectorAll(".ck-editor");

editorElements.forEach((editorElement) => {
    ClassicEditor.create(editorElement, {
        toolbar: ["bold", "italic"],
        enterMode: "br", // Mengganti baris baru dengan <br>
        autoParagraph: false, // Menonaktifkan wrapping teks dalam <p>
    }).catch((error) => {
        console.error(error);
    });
});

const form = document.getElementById('new-article')
const articleInput = document.querySelector('input[name=content]')

tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap preview anchor emoticons pagebreak media insertdatetime code codesample autolink autoresize table visualblocks searchreplace nonbreaking',
    toolbar_mode: 'floating',
    codesample_global_prismjs: true,
    codesample_languages: [
        { text: 'HTML/XML', value: 'markup' },
        { text: 'JavaScript', value: 'javascript' },
        { text: 'CSS', value: 'css' },
        { text: 'PHP', value: 'php' },
        { text: 'Ruby', value: 'ruby' },
        { text: 'Python', value: 'python' },
        { text: 'Java', value: 'java' },
        { text: 'Kotlin', value: 'kotlin' },
        { text: 'C', value: 'c' },
        { text: 'C#', value: 'csharp' },
        { text: 'C++', value: 'cpp' }
    ],
    setup: (editor) => {
        editor.on('init', () => {
            let articleContent = articleInput.value
            editor.setContent(articleContent)
        })
    }
});


form.addEventListener('submit', () => {
    articleInput.value = tinymce.activeEditor.getContent()
})



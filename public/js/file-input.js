const fileField = document.querySelector('.file-field')
const fileInput = document.querySelector(".file-field .file-wrapper input[type=file]")
const filePath = document.querySelector('.file-field .file-wrapper .file-path')

const fileDisplay = document.querySelector('.illustration-image')

fileField.addEventListener('click', () => {
    fileInput.click()
})

fileInput.addEventListener('change', () => {

    if (fileInput.value !== "") {
        let file = fileInput.files[0]
        //let reader = new FileReader()
        // reader.addEventListener('load', (event) => {
        //     let imageNode = fileDisplay.querySelector('img')
        //     imageNode.src = e.target.result
        // })
        fileDisplay.style.display = "block"
        let imageNode = fileDisplay.querySelector('img')
        imageNode.src = URL.createObjectURL(file)
        filePath.value = fileInput.value
        //reader.readAsDataURL(file)

    }
})
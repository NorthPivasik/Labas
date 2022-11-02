function find(number) {
    const textarea = document.getElementById("textarea")

    const btn = document.getElementById(`btn_${number}`)
    const textToFind = String(btn.textContent)

    const selStart = textarea.value.indexOf(textToFind)
    const selEnd = selStart + textToFind.length
    const fullText = textarea.value
    textarea.value = fullText.substring(0, selEnd)
    textarea.scrollTop = textarea.scrollHeight
    textarea.value = fullText
    textarea.setSelectionRange(selStart, selStart + textToFind.length)
    textarea.focus();
}
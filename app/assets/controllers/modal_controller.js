import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static targets = ['dialog', 'body']
    static values = { content: String }

    open(event) {
        event.preventDefault()
        const dialog = document.querySelector('[data-modal-target="dialog"]')
        const body = dialog.querySelector('[data-modal-target="body"]')
        body.textContent = this.contentValue
        dialog.showModal()
    }

    close() {
        this.dialogTarget.close()
    }
}

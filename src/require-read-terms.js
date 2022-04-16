import Swal from 'sweetalert2'

class RequireReadTerms {
    haveRead = false
    haveAgreed = false

    termsButton = document.getElementById("read-agree-terms-button")

    agreeButtonText = "Yes, I agree to these terms"
    agreeButtonColor = "#188632"
    cancelButtonText = "No, I don't agree"
    cancelButtonColor = "#d33"

    checkboxFieldTarget = null
    checkboxField = false

    formTarget = false

    constructor(config = {}) {

        Object.assign(this, config)

        if(this.checkboxFieldTarget != null)
            this.checkboxField = document.querySelector(this.checkboxFieldTarget)

        this.eventListeners()
    }

    eventListeners() {
        //catch form submit
        let form = document.querySelector(this.formTarget)

        if (form.attachEvent) {
            form.attachEvent("submit", this.catchFormSubmit)
            return
        }

        form.addEventListener("submit", this.catchFormSubmit)

        //catch button click to show modal
        this.termsButton.onclick = () => this.showModal()
    }

    catchFormSubmit(e) {
        if(!window.requireReadTerms.confirmReadAndAgreed())
            e.preventDefault()
    }

    confirmReadAndAgreed() {
        if (!this.check())
            return this.remind()

        return true
    }

    check() {
        return this.haveRead === true
            && this.haveAgreed === true
    }

    remind() {
        this.showModal()

        return false
    }

    read() {
        this.haveRead = true
    }

    agreed() {
        this.read()

        this.haveAgreed = true

        this.termsButton.classList.add('agreed')
        this.termsButton.innerHTML = '<span>&#10003;</span> Agreed to Terms'

        if(this.checkboxField)
            this.checkboxField.checked = true

        this.closeModal()
    }

    closeModal(){
        Swal.close()
    }

    showModal(){
        Swal.fire({
            title: 'Terms & Conditions',
            html: document.querySelector("#required-terms").innerHTML,
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: this.agreeButtonColor,
            cancelButtonColor: this.cancelButtonColor,
            confirmButtonText: this.agreeButtonText,
            cancelButtonText: this.cancelButtonText
        }).then((result) => {
            if (result.isConfirmed) {
                this.agreed()
            }
        })
    }
}

document.addEventListener("DOMContentLoaded", function(){
    window.requireReadTerms = new RequireReadTerms(requireReadTermsConfig)
});

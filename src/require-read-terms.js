import Swal from 'sweetalert2'

class RequireReadTerms {
    haveRead = false
    haveAgreed = false

    termsButton = document.getElementById("read-agree-terms-button")

    constructor(formId) {
        this.formId = formId;

        this.eventListeners()
    }

    eventListeners() {
        //catch form submit
        let form = document.getElementById(this.formId)

        if (form.attachEvent) {
            form.attachEvent("submit", this.catchFormSubmit)
            return
        }

        form.addEventListener("submit", this.catchFormSubmit)

        //catch button click to show modal
        this.termsButton.onclick = () => this.showModal()
    }

    catchFormSubmit(e) {
        if (e.preventDefault)
            e.preventDefault()

        return this.confirmReadAndAgreed()
    }

    confirmReadAndAgreed() {
        if (!this.check())
            return this.remind()

        return this.check()
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

        this.closeModal()
    }

    closeModal(){
        Swal.close()
    }

    showModal(){
        Swal.fire({
            title: 'Terms & Conditions',
            html: document.getElementById("required-terms").innerHTML,
            // icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#188632',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'I agree to these terms'
        }).then((result) => {
            if (result.isConfirmed) {
                this.agreed()
            }
        })
    }
}

var requireReadTerms;
document.addEventListener("DOMContentLoaded", function(){
    requireReadTerms = new RequireReadTerms(requireReadTermsConfig.formId)
});

<?php

namespace Seven82Media\RequireReadTerms;

class FormTerms
{
    protected string $formId;
    protected string $terms;

    protected string $agreeButtonText = "Yes, I agree to these terms";
    protected string $agreeButtonColor = "#188632";

    protected string $cancelButtonText = "No, I don't agree";
    protected string $cancelButtonColor = "#d33";

    public function __construct(
        string $formId,
        string $terms
    ) {
        $this->formId = $this->sanitizeTextForJs($formId);
        $this->terms = $terms;
    }

    public function agreeButtonText(string $text)
    {
        $this->agreeButtonText = $this->sanitizeTextForJs($text);
    }

    public function agreeButtonColor(string $color)
    {
        $this->agreeButtonColor = $this->sanitizeTextForJs($color);
    }

    public function cancelButtonText(string $text)
    {
        $this->cancelButtonText = $this->sanitizeTextForJs($text);
    }

    public function cancelButtonColor(string $color)
    {
        $this->cancelButtonColor = $this->sanitizeTextForJs($color);
    }

    private function sanitizeTextForJs(string $text)
    {
        return json_encode($text);
    }

    public function getButton(): string
    {
        return <<<EOD
<button id="read-agree-terms-button" href="#required-terms">Read and Agree to Terms</button>
<div id="required-terms" style="display:none;">
    {$this->terms}
</div>
EOD;
    }

    public function displayButton(): void
    {
        echo $this->getButton();
    }

    public function getScriptCode(): string
    {
        $jsFile = 'https://cdn.jsdelivr.net/gh/jt782/require-read-terms-php@dev/dist/require-read-terms.js';
//        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        return <<<EOD
<script>
    var requireReadTermsConfig = {
        formId: '{$this->formId}',
        agreeButtonText: '{$this->agreeButtonText}',
        agreeButtonColor: '{$this->agreeButtonColor}',
        cancelButtonText: '{$this->cancelButtonText}',
        cancelButtonColor: '{$this->cancelButtonColor}'
    }
</script>
<script src="{$jsFile}"></script>
EOD;
    }

    public function loadScript(): void
    {
        echo $this->getScriptCode();
    }

    public function loadModalDisplayButton(): void
    {
        $this->displayButton();
        $this->loadScript();
    }
}

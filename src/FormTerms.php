<?php

namespace Seven82Media\RequireReadTerms;

class FormTerms
{
    protected string $formTarget;
    protected string $terms;

    protected string $agreeButtonText = "Yes, I agree to these terms";
    protected string $agreeButtonColor = "#188632";

    protected string $cancelButtonText = "No, I don't agree";
    protected string $cancelButtonColor = "#d33";

    protected ?string $checkboxFieldTarget = null;

    public function __construct(
        string $formTarget,
        string $terms
    ) {
        $this->formTarget = $this->sanitizeTextForJs($formTarget);
        $this->terms = $terms;
    }

    public function checkboxFieldTarget(string $id)
    {
        $this->checkboxFieldTarget = $this->sanitizeTextForJs($id);
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
        return addcslashes($text, '"');
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
        $jsFile = 'https://cdn.jsdelivr.net/gh/jt782/require-read-terms-php@1.4.1/dist/require-read-terms.js';

        return <<<EOD
<script>
    var requireReadTermsConfig = {
        formTarget: "{$this->formTarget}",
        agreeButtonText: "{$this->agreeButtonText}",
        agreeButtonColor: "{$this->agreeButtonColor}",
        cancelButtonText: "{$this->cancelButtonText}",
        cancelButtonColor: "{$this->cancelButtonColor}",
        checkboxFieldTarget: "{$this->checkboxFieldTarget}"
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

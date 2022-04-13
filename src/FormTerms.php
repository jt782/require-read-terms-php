<?php

namespace Seven82Media\RequireReadTerms;

class FormTerms
{
    protected string $formId;
    protected string $terms;

    public function __construct(
        string $formId,
        string $terms
    ) {
        $this->formId = $formId;
        $this->terms = $terms;
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
        $jsFile = __DIR__ . 'require-read-terms.js';

        return <<<EOD
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{$jsFile}"></script>
<script>
    var requireReadTerms = new RequireReadTerms('{$this->formId}')
</script>
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

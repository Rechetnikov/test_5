<?php

    namespace Controllers;

    use Templates\Template;

    abstract class Controller
    {
        /**
         * @return string
         */
        abstract protected function layout(): string;

        /**
         *
         * @return string
         */
        public function view(): string
        {
            return $this->header() .
                $this->layout() .
                $this->footer();
        }

        /**
         *
         * @return string
         */
        protected function header(): string
        {
            return $this->template('Templates/Header.php');
        }

        /**
         *
         * @return string
         */
        public function footer(): string
        {
            return $this->template('Templates/Footer.php');
        }

        /**
         *
         * @param string $file_name
         * @param array|null $vars
         * @return string
         */
        public function template(string $file_name, ?array $variables = null): string
        {
            $template = new Template($file_name, $variables);

            return $template->view();
        }
    }

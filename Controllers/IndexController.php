<?php

    namespace Controllers;

    use Controllers\Controller;
    use Models\Good;
    use Models\User;

    class IndexController extends Controller
    {
        /**
         *
         * @return void
         */
        public function indexAction(): void
        {
            echo $this->view();
        }

        /**
         *
         * @return void
         */
        public function getError(): void
        {
            echo $this->header() .
                $this->template('Templates/Error.php') .
                $this->footer();
        }

        /**
         *
         * @return string
         */
        private function getForm(): string
        {
            return $this->template('Templates/IndexLayout/Form.php');
        }

        /**
         *
         * @return string
         */
        private function getGoods(): string
        {
            $goods = (new Good())->findAll();

            return $this->template('Templates/IndexLayout/Goods.php', ['goods' => $goods]);
        }

        /**
         *
         * @return string
         */
        private function getUsers(): string
        {
            $user = new User();

            $users = $user->findAll();

            return $this->template('Templates/IndexLayout/Users.php', ['users' => $users]);
        }

        /**
         * {@inheritDoc}
         */
        protected function layout(): string
        {
            $users = $this->getUsers();
            $form = $this->getForm();
            $goods = $this->getGoods();

            return $this->template('Templates/IndexLayout/Layout.php', [
                'users' => $users,
                'form' => $form,
                'goods' => $goods,
            ]);
        }
    }

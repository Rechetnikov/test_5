<?php

    namespace Controllers;

    use Controllers\Controller;
    use Models\Good;

    class GoodController extends Controller
    {
        /**
         * @var Good
         */
        private $good;

        /**
         *
         * @var int
         */
        private $id = 0;

        /**
         * @return void
         */
        public function __construct()
        {
            $this->good = new Good();
        }

        /**
         *
         * @param int $id
         * @return void
         */
        public function editAction(int $id): void
        {
            echo $this
                ->setId($id)
                ->view();
        }

        /**
         * {@inheritDoc}
         */
        protected function layout(): string
        {
            $good = $this->getGood();
            $id = $this->getId();

            $good = $good->findOne($id);

            return $this->getForm($good);
        }


        /**
         * @return Good
         */
        private function getRecordedGood(): Good
        {
            return $this
                ->getGood()
                ->setName($_POST['name'])
                ->setPrice((float) $_POST['price'])
                ->setImg((string) $_POST['img']);
        }


        /**
         * @return void
         */
        public function insertAction(): void
        {
            $this
                ->getRecordedGood()
                ->insert();

            header('Location: /');
        }

        /**
         * @return void
         */
        public function updateAction(): void
        {
            $this
                ->getRecordedGood()
                ->setId((int) $_POST['id'])
                ->update();

            header('Location: /');
        }

        /**
         *
         * @param int $id
         * @return void
         */
        public function deleteAction(int $id): void
        {
            $this
                ->getGood()
                ->setId($id)
                ->delete();

            header('Location: /');
        }

        /**
         *
         * @param array $good
         * @return string
         */
        private function getForm(array $good): string
        {
            return $this->template('Templates/GoodLayout/EditForm.php', ['good' => $good]);
        }

        /**
         *
         * @return string
         */
        public function addAction(): string
        {
            return $this->header() .
                $this->addLayout() .
                $this->footer();
        }

        /**
         *
         * @return string
         */
        protected function addLayout(): string
        {
            return $this->getAddForm();
        }

        /**
         * @return string
         */
        protected function getAddForm(): string
        {
            return $this->template('Templates/GoodLayout/AddForm.php');
        }

        /**
         *
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         *
         * @param int $id
         * @return self
         */
        public function setId(int $id): self
        {
            $this->id = $id;

            return $this;
        }

        /**
         * @return Good
         */
        private function getGood(): Good
        {
            return $this->good;
        }
    }

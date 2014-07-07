<?php

	namespace Delano\MainBundle\Entity;

	use Doctrine\ORM\Mapping as ORM;

	/**
	 * News
	 * @ORM\HasLifecycleCallbacks
	 * @ORM\Table()
	 * @ORM\Entity
	 */
	class News
	{
		/**
		 * @var integer
		 *
		 * @ORM\Column(name="id", type="integer")
		 * @ORM\Id
		 * @ORM\GeneratedValue(strategy="AUTO")
		 */
		private $id;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="author", type="string", length=255)
		 */
		private $author;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="title", type="string", length=255)
		 */
		private $title;

		/**
		 *
		 * @var File $image
		 */
		private $image;

		/**
		 * @var \DateTime
		 *
		 * @ORM\Column(name="date", type="datetime")
		 */
		private $date;

		/**
		 * @var string
		 *
		 * @ORM\Column(name="body", type="text")
		 */
		private $body;


		/**
		 * Get id
		 *
		 * @return integer
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * Set author
		 *
		 * @param string $author
		 * @return News
		 */
		public function setAuthor($author)
		{
			$this->author = $author;

			return $this;
		}

		/**
		 * Get author
		 *
		 * @return string
		 */
		public function getAuthor()
		{
			return $this->author;
		}

		/**
		 * Set title
		 *
		 * @param string $title
		 * @return News
		 */
		public function setTitle($title)
		{
			$this->title = $title;

			return $this;
		}

		/**
		 * Get title
		 *
		 * @return string
		 */
		public function getTitle()
		{
			return $this->title;
		}

		/**
		 * Set image
		 *
		 * @param string $image
		 * @return News
		 */
		public function setImage($image)
		{
			$this->image = $image;

			return $this;
		}

		/**
		 * Get image
		 *
		 * @return string
		 */
		public function getImage()
		{
			return $this->image;
		}

		/**
		 * Set date
		 *
		 * @param \DateTime $date
		 * @return News
		 */
		public function setDate($date)
		{
			$this->date = $date;

			return $this;
		}

		/**
		 * Get date
		 *
		 * @return \DateTime
		 */
		public function getDate()
		{
			return $this->date;
		}

		/**
		 * Set body
		 *
		 * @param string $body
		 * @return News
		 */
		public function setBody($body)
		{
			$this->body = $body;

			return $this;
		}

		/**
		 * Get body
		 *
		 * @return string
		 */
		public function getBody()
		{
			return $this->body;
		}
	}
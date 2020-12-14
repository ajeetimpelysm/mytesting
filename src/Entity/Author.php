<?php 

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Author
{
    /**
     * @Assert\NotBlank
     */
    public $name;

    /**
     * 
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\Length(
     *      min = 1,
     *      max = 10,
     *      minMessage = "Description must be at least {{ limit }} characters long",
     *      maxMessage = "Description cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotNull()
     * @Assert\NotBlank(message="Asset Description field cannot be empty")
     * 
     */
    public $description;

    /**
     * @Assert\NotBlank
     */
    public $experties;
}
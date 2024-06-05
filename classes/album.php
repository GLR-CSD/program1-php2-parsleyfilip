<?php

class album
{
    /** @var int|null Het ID van de album */
    private ?int $id;

    /** @var string De naam van de album */
    private string $naam;

    /** @var string De artiesten van de album */
    private string $artiesten;

    /** @var string|null Releasedatum van het album */
    private ?string $release_datum;

    /** @var string|null URL van het album */
    private ?string $url;

    /** @var string|null Afbeelding van het album */
    private ?string $afbeelding;

    /** @var string|null  Prijs van het album */
    private ?string $prijs;

    /**
     * @param int|null $id
     * @param string $naam
     * @param string $artiesten
     * @param string|null $release_datum
     * @param string|null $url
     * @param string|null $afbeelding
     * @param string|null $prijs
     */
    public function __construct(?int $id, string $naam, string $artiesten, ?string $release_datum, ?string $url, ?string $afbeelding, ?string $prijs)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->artiesten = $artiesten;
        $this->release_datum = $release_datum;
        $this->url = $url;
        $this->afbeelding = $afbeelding;
        $this->prijs = $prijs;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNaam(): string
    {
        return $this->naam;
    }

    /**
     * @param string $naam
     */
    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    /**
     * @return string
     */
    public function getArtiesten(): string
    {
        return $this->artiesten;
    }

    /**
     * @param string $artiesten
     */
    public function setArtiesten(string $artiesten): void
    {
        $this->artiesten = $artiesten;
    }

    /**
     * @return string|null
     */
    public function getReleaseDatum(): ?string
    {
        return $this->release_datum;
    }

    /**
     * @param string|null $release_datum
     */
    public function setReleaseDatum(?string $release_datum): void
    {
        $this->release_datum = $release_datum;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getAfbeelding(): ?string
    {
        return $this->afbeelding;
    }

    /**
     * @param string|null $afbeelding
     */
    public function setAfbeelding(?string $afbeelding): void
    {
        $this->afbeelding = $afbeelding;
    }

    /**
     * @return string|null
     */
    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    /**
     * @param string|null $prijs
     */
    public function setPrijs(?string $prijs): void
    {
        $this->prijs = $prijs;
    }

    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM album");

        // Array om personen op te slaan
        $albums = [];

        // Itereren over de resultaten en albums toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album(
                $row['id'],
                $row['naam'],
                $row['artiesten'],
                $row['release_datum'],
                $row['url'],
                $row['afbeelding'], // This was missing
                $row['prijs']
            );
            $albums[] = $album;
        }

        // Retourneer array met albums
        return $albums;
    }
}
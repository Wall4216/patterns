<?php

interface Specification
{
    public function isNormal(Pupil $pupil):bool;
}
class Pupil
{
    private int $rate = 0;

    /**
     * @param int $rate
     */
    public function __construct(int $rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }
}

class PupilSpecification implements Specification
{

    private int $needRate = 0;

    /**
     * @param int $needRate
     */
    public function __construct(int $needRate)
    {
        $this->needRate = $needRate;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return $this->needRate < $pupil->getRate();
    }
}

class AndSpecification implements Specification
{

    private array $specification;

    /**
     * @param array $specification
     */
    public function __construct(Specification ...$specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification)
        {
            if (!$specification->isNormal($pupil))
            {
                return false;
            }
        }
        return true;
    }
}

class OrSpecification implements Specification
{

    private array $specification;

    /**
     * @param array $specification
     */
    public function __construct(Specification ...$specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        foreach ($this->specification as $specification)
        {
            if ($specification->isNormal($pupil))
            {
                return true;
            }
        }
        return false;
    }
}

class NotSpecification implements Specification
{
    private Specification $specification;

    /**
     * @param Specification $specification
     */
    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isNormal(Pupil $pupil): bool
    {
        return $this->specification->isNormal($pupil);
    }
}


$spec1 = new PupilSpecification(5);
$spec2 = new PupilSpecification(10);
$pupil = new Pupil(6);
var_dump($spec1->isNormal($pupil));

$andSpec = new AndSpecification($spec1, $spec2);
var_dump($andSpec->isNormal($pupil));
$orSpec = new OrSpecification($spec1, $spec2);
var_dump($orSpec->isNormal($pupil));
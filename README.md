[![Build Status](https://travis-ci.com/rsilveira65/triangle-challenge.svg?token=z2yf7ZpVZudwz9Cxdor9&branch=master)](https://travis-ci.com/rsilveira65/triangle-challenge)# triangle-challenge

## Goal

Write a program that will determine the type of a triangle. It should take the lengths of the triangle's three sides as input, and return whether the triangle is equilateral, isosceles or scalene.

## Types of triangle by lengths of sides

- An equilateral triangle has all sides the same length. An equilateral triangle is also a regular polygon with all angles measuring 60°.
- An isosceles triangle has two sides of equal length. An isosceles triangle also has two angles of the same measure, namely the angles opposite to the two sides of the same length;
- A scalene triangle has all its sides of different lengths. Equivalently, it has all angles of different measure.

![alt tag](https://2.bp.blogspot.com/-9aI6coFWyf8/Uj721_acrfI/AAAAAAAAF60/w0l9iyaas5w/s1600/Triangle+sides.png)

## Infrastructure Requirements

- [Docker](https://docs.docker.com/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)


## Getting Started
Just make sure you have docker and docker-compose properly installed.
```sh
docker --version
docker-compose --version
```

```sh
docker-compose run application php triangle-challenge.php run:calculate --sideA=12 --sideB=22 --sideC=12
```

In the first moment, docker will download and install the base PHP7 image and all necessary libs and extensions to run the project properly. After that, the calculate command must be executed.
Eg: Output result table.
![alt tag](https://i.imgur.com/RjvFC2w.png)

## Unit Tests
Get unit test summary on executing

```sh
docker-compose run application composer test
```
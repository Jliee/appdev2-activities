-- Submitted by Julie

-- Creating a Database:
CREATE DATABASE Company;

-- Selecting a Database:
USE Company;

-- Creating a Table:
CREATE TABLE Employees ( 
    EmployeeID INT PRIMARY KEY,
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    Age INT,
    Department VARCHAR(20)
);

-- Inserting Data into the Table:
INSERT INTO Employees (EmployeeID, FirstName, LastName, Age, Department)
VALUES (1, 'Julie', 'Oyong', 21, 'HR'),
       (2, 'Paula', 'Jabinal', 21, 'Finance'),
       (3, 'Aurora', 'Bactol', 22, 'IT'),
       (4, 'Zayne', 'Li', 27, 'Marketing'),
       (5, 'Aventurine', 'Medes', 29, 'Sales');

--Viewing Data:
SELECT * FROM Employees;

--Updating Data:
UPDATE Employees
SET Department='Marketing'
WHERE EmployeeID = 2;

--Deleting Data:
DELETE FROM Employees
WHERE EmployeeID = 3;

--Dropping the Table:
DROP TABLE Employees;

import db from '../config/db';

export interface Groomer {
    groomer_id: number;
    siret_number: string;
    address: string;
    city: string;
    department: string;
}

export class GroomerModel {
    static getAll(): Groomer[] {
        const stmt = db.prepare('SEMECT * FROM Groomer');
        return stmt.all() as Groomer[];
    }

    static getById(id: number): Groomer | undefined {
        const stmt = db.prepare('SELECT * FROM Groomer WHERE groomer_id = ?');
        return stmt.get(id) as Groomer | undefined;
    }

    static create(groomer: Omit<Groomer, 'groomer_id'>): number {
        const stmt = db.prepare(`
            INSERT INTO Groomer (siret_number, address, city, department)
            VALUES (?,?,?,?)    
        `);
        const result = stmt.run(
            groomer.siret_number,
            groomer.address,
            groomer.city,
            groomer.department
        );
        return result.lastInsertRowid as number;
    }

    static update(id: number, groomer: Partial<Omit<Groomer, 'groomer_id'>>): number { // https://grok.com/share/bGVnYWN5_fa30fb5f-2f76-4f0b-871b-e6282cfe2d79
        const fields = [];
        const values = [];

        if (groomer.siret_number) {
            fields.push('siret_number = ?');
            values.push(groomer.siret_number);
        }
        if (groomer.address) {
            fields.push('address = ?');
            values.push(groomer.address);
        }
        if(groomer.city) {
            fields.push('city = ?');
            values.push(groomer.city);
        }
        if(groomer.department) {
            fields.push('department = ?');
            values.push(groomer.department);
        }

        if (fields.length === 0) {
            return 0;
        }

        const stmt = db.prepare(`
            UPDATE Groomer
            SET ${fields.join(', ')}
            WHERE groomer_id = ?
        `);

        const result = stmt.run(...values, id);
        return result.changes;
    }

    static delete(id: number): number {
        const stmt = db.prepare('DELETE FROM Groomer WHERE groomer_id = ?');
        const result = stmt.run(id);
        return result.changes;
    }
}
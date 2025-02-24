import db from '../config/db';

export interface User {
    user_id?: number;
    email: string;
    password: string;
    last_name: string;
    first_name: string;
    id_groomer?: number;
}

export class UserModel {
    static getAll() {
        const stmt = db.prepare('SELECT * FROM User');
        return stmt.all();
    }

    static getById(id: number) {
        const stmt = db.prepare('SELECT * FROM User WHERE user_id = ?');
        return stmt.get(id);
    }

    static create(user: User) {
        const stmt = db.prepare(`
            INSERT INTO User (email, password, last_name, first_name, id_groomer)
            VALUES (?, ?, ?, ?, ?)
        `);
        const info = stmt.run(
            user.email,
            user.password,
            user.last_name,
            user.first_name,
            user.id_groomer
        );
        return info.lastInsertRowid;
    }
}
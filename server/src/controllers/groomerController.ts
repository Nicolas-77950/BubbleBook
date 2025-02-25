import { Request, Response } from 'express';
import { GroomerModel } from '../models/groomerModel';

export class GroomerController {
    static async getAllGroomers(req: Request, res: Response) {
        try {
            const groomers = GroomerModel.getAll();
            res.json(groomers);
        } catch (error) {
            res.status(500).json({ message: 'Error retrieving groomers', error });
        }
    }

    static async getGroomerById(req: Request, res: Response) {
        try {
            const id = parseInt(req.params.id);
            const groomer = GroomerModel.getById(id);
            if(!groomer) {
                res.status(404).json({ message: 'Groomer not found' });
            }
            res.json(groomer);
        } catch (error) {
            res.status(500).json({ message: 'Error retrieving groomer', error });
        }
    }

    static async createGroomer(req: Request, res: Response) {
        try {
            const { siret_number, address, city, department } = req.body;
            const id = GroomerModel.create({ siret_number, address, city, department });
            res.status(201).json({ id, message: 'Groomer created successfully' });
        } catch (error) {
            res.status(500).json({ message: 'Error creating groomer', error });
        }
    }

    static async updateGroomer(req: Request, res: Response) {
        try {
            const id = parseInt(req.params.id);
            const changes = GroomerModel.update(id, req.body);
            if (changes === 0) {
                res.status(404).json({ message: 'Groomer not found or no changes made' });
            }
            res.json({ message: 'Groomer updated successfully' });
        } catch (error) {
            res.status(500).json({ message: 'Error updating groomer', error });
        }
    }

    static async deleteGroomer(req: Request, res: Response) {
        try {
            const id = parseInt(req.params.id);
            const changes = GroomerModel.delete(id);
            if (changes === 0) {
                res.status(404).json({ message: 'Groomer not found' });
            }
            res.json({ message: 'Groomer deleted successfully' });
        } catch (error) {
            res.status(500).json({ message: 'Error deleting groomer', error });
        }
    }
}
import { Request, Response} from 'express';
import { UserModel } from '../models/userModel';

export class UserController {
    static async getAllUsers(req: Request, res: Response) {
        try {
            const users = UserModel.getAll();
            res.json(users);
        } catch (error) {
            res.status(500).json({ error: 'Erreur lors de la récupération des utilisateurs' });
        }
    }

    static async getUserById(req: Request, res: Response) {
        try {
            const user = UserModel.getById(parseInt(req.params.id));
            if (user) {
                res.json(user);
            } else {
                res.status(404).json({ error: 'Utilisateur non trouvé' });
            }
        } catch (error) {
            res.status(500).json({ error: 'Erreur lors de la récupération de l\'utilisateur' });
        }
    }

    static async createUser(req: Request, res: Response) {
        try {
            const userData = req.body;
            const newUserId = UserModel.create(userData);
            res.status(201).json({ id: newUserId });
        } catch (error) {
            res.status(500).json({ error: 'Erreur lors de la création de l\'utilisateur' });
        }
    }
}